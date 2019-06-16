export const validate = obj => {
    const check = checkIfNull(obj);
    let theMessage = null;

    if (check === false) {
        return;
    } else {
        theMessage = showMessage(check);
    }

    return theMessage;
};

const checkIfNull = obj => {
    for (let value in obj) {
        if (obj[value] === "") {
            return value;
        }
        if (value === 'human' && obj[value] != 2) {
            return value;
        }
    }

    return false;
};

const showMessage = key => {
    let message;
    switch(key) {
        case 'fullName':
            message = 'Please enter your full name';
            break;
        case 'email':
            message = 'Please enter your email address';
            break;
        case 'company':
            message = 'Please enter your company name';
            break;
        case 'phone':
            message = 'Please enter your phone number';
            break;
        case 'human':
            message = 'Please solve the math problem';
            break;
        default:
            message = 'Please fill out the form completely';
    }

    return message;
}