async function getIATA(iata) {
	const params = {
		'action': 'airport_action',
		'nonce': bdbpData.ajax_nonce,
		'iata': iata
	}

	let response = await fetch(bdbpData.ajax_url, {
		method: 'POST',
    	headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    	},
    	body: new URLSearchParams(params).toString()
	});

	let result = await response.json();
	console.log(result);
}

getIATA('AAA');