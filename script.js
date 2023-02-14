document.addEventListener('DOMContentLoaded', function(){

    tippy('[data-tippy-content]', {
        placement: 'top',
        animation: 'scale',
        duration: [250,0],
        theme: 'tippy',
    });

    tippy('#tippy-songs', {
        content: 'Nombre de morceaux',
        placement: 'left',
        animation: 'scale',
        duration: [250,0],
        theme: 'tippy-songs',
        arrow: false,
        followCursor: true,
    });

})