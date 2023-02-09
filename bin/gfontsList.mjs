import fs from 'fs'

const ApiUrl = 'https://www.googleapis.com/webfonts/v1/webfonts'
const destination = './inc/third-party/fonts.json'
const apiParams = {
	key: 'your key', // here the api key https://gist.github.com/jeremykenedy/bce044ce26fe0f90559a
	sort: 'popularity'
}

async function getFontSet(params) {
	let fonts = [];
	/* build the query url */
	const req = new URLSearchParams(params);
	const apiRequest = ApiUrl + '?' + req.toString();
	/* fetch the api and then return the raw data */
	await fetch(apiRequest)
		.then((response) => {
			return response.json()
		})
		.then((data) => {
			console.log('Fetch for new font successfully')
			console.log(data.items)

			/* parse and store the data that we need */
			fonts = data.items.map(item => { return {
				[item.family]: item.variants}
			} )

			console.log(fonts)

			const generatedJson = JSON.stringify(fonts, null, 2)

			console.log('Writing into ' + destination)

			fs.writeFileSync(
				destination,
				generatedJson, {
					encoding: 'utf8'
				}, (err, data) => {
					if (err) {
						return err;
					}
					console.log(data)
					return true
				})
		})
		.catch((err) => {
			console.log(err)
			return err
		});

	return false
}

/** Create the colorset then output the result */
await getFontSet(apiParams)

process.exit(0)
