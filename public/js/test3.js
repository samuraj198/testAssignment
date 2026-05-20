(function () {
    let device = 'Desktop';

    if (/Mobi|Andriod|IPhone/i.test(navigator.userAgent)) {
        device = 'Mobile'
    }

    fetch('http://ip-api.com/json/')
        .then(res => res.json())
        .then(geo => {
            fetch('http://127.0.0.1:8000/api/visits', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    ip_address: geo.query,
                    city: geo.city || '???',
                    device: device
                })
            })
        }).catch(e => console.error(e));
})();
