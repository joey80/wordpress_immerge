export const contact = () => {
  const lat = 38.45115;
  const lng = -78.87053;
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
    center: { lat: theLat, lng: theLng },
    zoom: 15,
  });

  return newMap;
};

const addMapMarkers = (array, map) => {
  let marker = new google.maps.Marker({
    position: new google.maps.LatLng(array[0], array[1]),
    animation: google.maps.Animation.DROP,
    map: map,
    icon: 'http://100.26.102.174/wp-content/uploads/2019/06/logo_sprout_marker.png',
  });

  let markerContent = array[2],
    infoWindow = new google.maps.InfoWindow({
      content: markerContent,
    });

  google.maps.event.addListener(marker, 'click', () => {
    infoWindow.open(map, marker);
  });
};

export default { contact };
