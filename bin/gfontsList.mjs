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
			console.log('Fetch for new fonts successfully')
			console.log(data.items)

			/* Parse and store the data that we need */
			fonts = data.items.map(item => { return {
				[item.family]: item.variants}
			} )

			/* Convert the js object into a pretty printed json. */
			const generatedFontSet = JSON.stringify(fonts, null, 2)

			/* log some data in order to check that everything is working properly.  */
			console.log(fonts);
			console.log('Writing into ' + destination)

			/* write the json to the file used into customizer to select the file */
			fs.writeFileSync(
				destination,
				generatedFontSet, {
					encoding: 'utf8'
				}, (err, data) => {
					if (err) {
						return err;
					}
					return true
				})
		})
		.catch((err) => {
			console.log(err)
			return err
		});

	return false
}

/** Create the fontset then output the result */
await getFontSet(apiParams)

process.exit(0)
