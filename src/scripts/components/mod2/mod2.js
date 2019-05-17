/**
* mod2.js - A demo of ES6 modules
*
* Author - Joey Leger (2018)
* Description - These are helpful
*
*/
export function mod2() {
    return 'Im mod2';
};

export function mod2a() {
    return 'Im mod2a'
};

export function init() {
    console.log(`${mod2()} and ${mod2a()}`);
};

export default { mod2, mod2a, init };