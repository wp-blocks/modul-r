import fs from 'fs'

const ApiUrl = 'https://www.googleapis.com/webfonts/v1/webfonts'
const destination = './inc/third-party/fonts.json'


/**
 * Get the value of a node argument
 * 
 * @param {number} argNumber
 * @param {string} argString
 * 
 */
const getArgs = (argNumber, argString) => {
	return process.argv[argNumber].replace(argString, '');
}

/**
 * It's setting the api key and the sort order.
 * 
 * Api args available for the sort arg
 * sorting could be
 * alpha: Sort the list alphabetically
 * date: Sort the list by date added (most recent font added or updated first)
 * popularity: Sort the list by popularity (most popular family first)
 * style: Sort the list by number of styles available (family with most styles first)
 * trending: Sort the list by families seeing growth in usage (family seeing the most growth first)
 *
 * @type {{sort: (string|string), key: string}}
 */
const apiParams = {
	key: 'apikey', // here the api key https://gist.github.com/jeremykenedy/bce044ce26fe0f90559a
	sort: process.argv[2] ? getArgs( 2, '-sort=' ) : 'popularity'
}

/**
 * Checking if the value is a number.
 * 
 * @param {string} value
 */
function isNumeric(value) {
	return /^-?\d+$/.test(value);
}

/**
 * Converting the weight to a number.
 */
function getVariants(weights) {
	let newWeights = [];
	weights.forEach((weight) => {
		if (isNumeric(weight)) {
			newWeights.push(weight)
		} else if (weight === 'regular') {
			newWeights.push('400')
		}
	})
	return newWeights
}

/** 
 * Fetching the data from the Google Fonts API and then writing it to a file.
 * 
 * @param {Object} params
 */
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
				[item.family]: getVariants(item.variants)}
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
