import { validate } from './validate';

export const contact = () => {
    const lat = 38.451150;
    const lng = -78.870530;
    const map = loadMap(lat, lng);
    const markup = `
        <div>
            <strong>Immerge</strong>
            <p>139 N. Liberty St., Suite 202<br />
            Harrisonburg, VA 22802</p>
            <p>(540) 437-9617</p>
        </div>`;
    const info = [lat, lng, markup];

    addMapMarkers(info, map);
    eventListenerInit();
};

const loadMap = (theLat, theLng) => {
    const newMap = new google.maps.Map(document.getElementById('map'), {
        center: {lat: theLat, lng: theLng},
        zoom: 15
    });

    return newMap;
};

const addMapMarkers = (array, map) => {
    let marker = new google.maps.Marker({
        position: new google.maps.LatLng(array[0], array[1]),
        animation: google.maps.Animation.DROP,
        map: map,
        icon: 'http://100.26.102.174/wp-content/uploads/2019/06/logo_sprout_marker.png'
    });

    let markerContent = array[2],
        infoWindow = new google.maps.InfoWindow({
        content: markerContent
        });

    google.maps.event.addListener(marker, 'click', () => {
        infoWindow.open(map, marker);
    });
};

const eventListenerInit = () => {
    const button = document.getElementById('submit-button');
    const errorBox = document.querySelector('.contact__section__error');
    const theForm = document.getElementById('theForm');

    button.addEventListener('click', event => {
        event.preventDefault();
        const formFields = {
            fullName: document.getElementsByName('fullName')[0].value,
            email: document.getElementsByName('email')[0].value,
            company: document.getElementsByName('company')[0].value,
            phone: document.getElementsByName('phone')[0].value,
            human: document.getElementsByName('human')[0].value
        }
        const errorMessage = validate(formFields);

        if (errorMessage != null) {
            errorBox.innerHTML = errorMessage;
        } else {
            errorBox.innerHTML = "";
            theForm.submit();
        }
    });
}

export default { contact };