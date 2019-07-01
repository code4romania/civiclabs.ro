// https://github.com/uxitten/polyfill/blob/master/string.polyfill.js
// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/padStart
if (!String.prototype.padStart) {
    String.prototype.padStart = function padStart(targetLength, padString) {
        targetLength = targetLength >> 0; //truncate if number, or convert non-number to 0;
        padString = String(typeof padString !== 'undefined' ? padString : ' ');
        if (this.length >= targetLength) {
            return String(this);
        } else {
            targetLength = targetLength - this.length;
            if (targetLength > padString.length) {
                padString += padString.repeat(targetLength / padString.length); //append to original to ensure we are longer than needed
            }
            return padString.slice(0, targetLength) + String(this);
        }
    };
}

export default {
    zeroPad(value, length) {
        return value.toString().padStart(length, '0');
    },
    defaultDateFormatter(date) {
        if (typeof date == 'string') {
            date = new Date(date);
        }

        let y = date.getFullYear(),
            m = this.zeroPad(date.getMonth() + 1, 2),
            d = this.zeroPad(date.getDate(), 2);

        return `${y}-${m}-${d}`;
    },
    debounce(fn, wait, immediate) {
        let timeout;

        return function() {
            let context = this,
                args = arguments,
                callNow = immediate && !timeout;

            let later = function() {
                timeout = null;

                if (!immediate) {
                    fn.apply(context, args);
                }
            };

            clearTimeout(timeout);
            timeout = setTimeout(later, wait);

            if (callNow) {
                fn.apply(context, args);
            }
        };
    },
};
