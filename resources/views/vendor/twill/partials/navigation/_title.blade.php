<h1 class="header__title">
    <a href="/" title="{{ config('app.name') }}">
        @svg('logo-white', [ 'height' => 15 ])
        <span class="envlabel">{{ app()->environment() === 'production' ? 'prod' : app()->environment() }}</span>
    </a>
</h1>

<style>
    .modal__content{overflow:visible!important}

    .block .block__content .block__body .datePicker__field .input {
        margin-top: 0;
    }

    .s--picked .checkbox__icon {
        opacity: 1;
    }
</style>
