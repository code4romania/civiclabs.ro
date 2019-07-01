module.exports = {
    parser: 'vue-eslint-parser',
    parserOptions: {
        parser: 'babel-eslint',
    },
    root: true,
    extends: [
        'eslint:recommended',
        'plugin:vue/recommended',
    ],
    env: {
        browser: true,
        node: true,
        es6: true
    },
    rules: {
        'no-console': 'off'
    }
}
