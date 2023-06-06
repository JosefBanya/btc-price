function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

function refreshPairs() {
    fetch('/update-pairs')
        .then(res => res.json())
        .then(res => {
            if (typeof res.exchangePairs !== 'undefined') {
                res.exchangePairs.map(item => {
                    const element = document.querySelector(`#${item.symbol}`);
                    const buy = element.querySelector('#buy');
                    const price = element.querySelector('#price');
                    const sell = element.querySelector('#sell');
                    price.innerHTML = item.price;
                    buy.innerHTML = item.buy;
                    sell.innerHTML = item.sell;

                });
            }
        })
}


docReady(function() {
    setInterval(refreshPairs, 5000);
});