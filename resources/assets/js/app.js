import Vue from 'vue';
import Buefy from 'buefy';

import CShare from './components/Share';
import CCookieConsent from './components/CookieConsent';
import CApplicationForm from './components/ApplicationForm';
import CApplicationFormSection from './components/ApplicationFormSection';
import CEvaluationForm from './components/EvaluationForm';
import CPartnersStripe from './components/PartnersStripe';
import utils from './utils';

Vue.use(Buefy, {
    defaultFirstDayOfWeek: 1,
    defaultDayNames: window.defaultDayNames,
    defaultMonthNames: window.defaultMonthNames,
    defaultDateFormatter: (date) => utils.defaultDateFormatter(date),
});

Vue.component('c-share', CShare);
Vue.component('c-cookie-consent', CCookieConsent);
Vue.component('c-application-form', CApplicationForm);
Vue.component('c-application-form-section', CApplicationFormSection);
Vue.component('c-evaluation-form', CEvaluationForm);
Vue.component('c-partners-stripe', CPartnersStripe);

new Vue({
    el: '#app',
    data: {
        isBlockPreview: !!document.querySelector('html.block-preview'),
        isSolutionModalFinancersActive: false,
        activeSolutionFilter: '',
        isNavbarOpen: false,
    },
})
