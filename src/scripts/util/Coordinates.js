// Gets the X and Y coordinates of a div
export function Coordinates(elm) {
    let xPos = 0;
    let yPos = 0;

    xPos += (elm.offsetLeft - elm.scrollLeft + elm.clientLeft);
    yPos += (elm.offsetTop - elm.scrollTop + elm.clientTop);

    return {
        x: xPos,
        y: yPos
    };
};

export default { Coordinates };