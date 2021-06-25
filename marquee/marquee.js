const MARQUEE = document.querySelectorAll('div');

function fadeIn(index){
    let next;

    if(index!=MARQUEE.length-1) next = index+1;
    else next = 0;

    MARQUEE[index].className='now';
    MARQUEE[next].className='next';

    setTimeout(fadeOut,DURATION+TRANSITION,index);                
}

function fadeOut(index){
    let next;

    if(index!=MARQUEE.length-1) next = index+1;
    else next = 0;

    MARQUEE[index].className='previous';

    setTimeout(fadeIn,PAUSE+TRANSITION,next);
}

setTimeout(fadeIn,PAUSE+100,0);