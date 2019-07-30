workflow "Build on push" {
    on = "push"
    resolves = [
        "build frontend",
        "npm install",
        "twill-build",
    ]
}

action "composer install" {
    uses = "MilesChou/composer-action@master"
    args = "install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts"
}

action "npm install" {
    uses = "actions/npm@59b64a598378f31e49cb76f27d6f3312b582f680"
    args = "install --no-save"
}

action "build frontend" {
    uses = "actions/npm@master"
    args = "run production"
    needs = ["npm install"]
}

action "codesniffer" {
    uses = "docker://cytopia/phpcs"
    needs = ["composer install"]
}

action "twill-install" {
    uses = "actions/npm@master"
    needs = ["codesniffer"]
    args = "run twill-install"
}

action "twill-build" {
    uses = "actions/npm@master"
    needs = ["twill-install"]
    args = "run twill-build"
}
