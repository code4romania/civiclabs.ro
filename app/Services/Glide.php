<?php

namespace App\Services;

use A17\Twill\Services\MediaLibrary\ImageServiceDefaults;
use A17\Twill\Services\MediaLibrary\ImageServiceInterface;
use League\Glide\Signatures\SignatureFactory;
use League\Glide\Urls\UrlBuilder;

class Glide implements ImageServiceInterface
{
    use ImageServiceDefaults;

    private $urlBuilder;

    public function __construct()
    {
        $baseUrl = asset(config('glide.base_url'));


        $urlBuilder = new UrlBuilder(rtrim($baseUrl, '/'));

        if (config('glide.use_signed_urls')) {
            $urlBuilder->setSignature(SignatureFactory::create(config('app.key')));
        }

        $this->urlBuilder = $urlBuilder;
    }

    public function getUrl($id, array $params = [])
    {
        if (!ends_with($id, '.svg')) {
            $params = array_replace(config('glide.default_params'), $params);

            if (isset($params['rect'])) {
                list($crop_x, $crop_y, $crop_w, $crop_h) = explode(',', $params['rect']);

                unset($params['rect']);

                $convert = $this->getCrop([
                    'crop_w' => $crop_w,
                    'crop_h' => $crop_h,
                    'crop_x' => $crop_x,
                    'crop_y' => $crop_y,
                ]);

                $params['crop'] = $convert['crop'];
            }
        } else {
            $params = [];
        }

        return $this->urlBuilder->getUrl($id, $params);
    }

    public function getUrlWithCrop($id, array $cropParams, array $params = [])
    {
        return $this->getUrl($id, $this->getCrop($cropParams) + $params);
    }

    public function getUrlWithFocalCrop($id, array $cropParams, $width, $height, array $params = [])
    {
        return $this->getUrl($id, $this->getFocalPointCrop($cropParams, $width, $height) + $params);
    }

    public function getLQIPUrl($id, array $params = [])
    {
        $defaultParams = config('glide.lqip_default_params');
        return $this->getUrl($id, array_replace($defaultParams, $params));
    }

    public function getSocialUrl($id, array $params = [])
    {
        $defaultParams = config('glide.social_default_params');
        return $this->getUrl($id, array_replace($defaultParams, $params));
    }

    public function getCmsUrl($id, array $params = [])
    {
        $defaultParams = config('glide.cms_default_params');
        return $this->getUrl($id, array_replace($defaultParams, $params));
    }

    public function getRawUrl($id)
    {
        return $this->urlBuilder->getUrl($id);
    }

    public function getDimensions($id)
    {
        $url = $this->urlBuilder->createURL($id, ['fm' => 'json']);

        try {
            $imageMetadata = json_decode(file_get_contents($url), true);

            return [
                'width' => $imageMetadata['PixelWidth'],
                'height' => $imageMetadata['PixelHeight'],
            ];
        } catch (\Exception $e) {
            try {
                list($width, $height) = getimagesize($url);
                return [
                    'width' => $width,
                    'height' => $height,
                ];
            } catch (\Exception $e) {
                return [
                    'width' => 0,
                    'height' => 0,
                ];
            }
        }
    }

    protected function getCrop($crop_params)
    {
        if (!empty($crop_params)) {
            return [
                'crop' => sprintf(
                    '%d,%d,%d,%d',
                    $crop_params['crop_w'],
                    $crop_params['crop_h'],
                    $crop_params['crop_x'],
                    $crop_params['crop_y']
                )
            ];
        }

        return [];
    }

    protected function getFocalPointCrop($crop_params, $width, $height)
    {
        if (!empty($crop_params)) {
            // Determine center coordinates of user crop and express it
            // in terms of the original image width and height percentage
            $fpX = ($crop_params['crop_w'] / 2 + $crop_params['crop_x']) / $width;
            $fpY = ($crop_params['crop_h'] / 2 + $crop_params['crop_y']) / $height;

            // determine focal zoom
            if ($crop_params['crop_w'] > $crop_params['crop_h']) {
                $fpZ = $width / $crop_params['crop_w'];
            } else {
                $fpZ = $height / $crop_params['crop_h'];
            }

            // $params = ['fp-x' => $fpX, 'fp-y' => $fpY, 'fp-z' => $fpZ];
            return [
                'fit' => sprintf('crop-%d-%d', $fpX, $fpY),
            ];

            return array_map(function ($param) {
                return number_format($param, 4, ".", "");
            }, $params) + ['crop' => 'focalpoint', 'fit' => 'crop'];
        }

        return [];
    }
}
