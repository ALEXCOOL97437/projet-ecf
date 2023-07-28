const subscribe = document.getElementById('subscribe');

const setColorGreen = () => {
    subscribe.style.background = 'green'
}

const setColorRed = () => {
    subscribe.style.background = 'red'
}

subscribe.addEventListener('mouseenter', setColorGreen);
subscribe.addEventListener('mouseleave', setColorRed);