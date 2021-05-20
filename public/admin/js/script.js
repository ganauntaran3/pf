const citiesSelectElement = document.getElementById('cities')
const countriesSelectElement = document.getElementById('countries')
const ctaElement = document.getElementById('cta')
const statesSelectElement = document.getElementById('states')

const URL_AJAX_REQUEST_CITIES = 'ajax/request_cities.php'
const URL_AJAX_REQUEST_COUNTRIES = 'ajax/request_countries.php'
const URL_AJAX_REQUEST_STATES = 'ajax/request_states.php'

const createContactService = (url, content) => {
	const contactServiceBtn = document.createElement('a')

	contactServiceBtn.className = 'btn btn-light'
	contactServiceBtn.href = url
	contactServiceBtn.id = 'contact-service'
	contactServiceBtn.innerText = content
	contactServiceBtn.type = 'button'

	return contactServiceBtn
}

// Function for creating option boilerplate
const createOption = (value, content) => {
	return `<option value="${value}">${content}</option>`
}

// Function for fetching countries list
const fetchCountries = () => {
	return new Promise(async (resolve, reject) => {
		const data = await fetch(URL_AJAX_REQUEST_COUNTRIES)

		if (data.status === 200 || data.ok) {
			const { countries } = await data.json()
			return resolve(countries)
		}

		return reject({
			error: true,
			message: 'Failed to fetch countries!',
		})
	})
}

// Function for fetching cities list
const fetchCities = stateId => {
	return new Promise(async (resolve, reject) => {
		const data = await fetch(URL_AJAX_REQUEST_CITIES, {
			method: 'post',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
			},
			body: `state_id=${stateId}`,
		})

		if (data.status === 200 || data.ok) {
			const { cities } = await data.json()
			return resolve(cities)
		}

		return reject({
			error: true,
			message: 'Failed to fetch cities!',
		})
	})
}

// Function for fetching states list
const fetchStates = countryId => {
	return new Promise(async (resolve, reject) => {
		const data = await fetch(URL_AJAX_REQUEST_STATES, {
			method: 'post',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
			},
			body: `country_id=${countryId}`,
		})

		if (data.status === 200 || data.ok) {
			const { states } = await data.json()
			return resolve(states)
		}

		return reject({
			error: true,
			message: 'Failed to fetch states!',
		})
	})
}

const addContactServiceBtn = () => {
	const contactBtn = createContactService(
		'https://t.me/contactName/text=Hello',
		'Please Contact Corporate Secretary'
	)

	if (ctaElement.contains(contactBtn)) {
		ctaElement.removeChild(contactBtn)
	}

	ctaElement.prepend(contactBtn)
	ctaElement.querySelector('button[type=submit]').setAttribute('disabled', true)
}

const removeContactServiceBtn = () => {
	const contactBtn = ctaElement.querySelector('#contact-service')

	if (ctaElement.contains(contactBtn)) {
		ctaElement.removeChild(contactBtn)
	}

	ctaElement.querySelector('button[type=submit]').removeAttribute('disabled')
}

// Immediately Invoked Function Expression
;(async () => {
	const countries = await fetchCountries()
	const blackLists = await (await fetch('except.json')).json()

	countriesSelectElement.innerHTML = [
		createOption(null, 'Choose your country'),
		...countries.map(country => {
			return createOption(country.id, country.name)
		}),
	].join('')

	countriesSelectElement.addEventListener('change', async function () {
		if (blackLists.countries.includes(+this.value)) addContactServiceBtn()
		else removeContactServiceBtn()

		const states = await fetchStates(this.value)

		statesSelectElement.innerHTML = [
			createOption(null, 'Choose your state'),
			...states.map(state => {
				return createOption(state.id, state.name)
			}),
		].join('')

		statesSelectElement.addEventListener('change', async function () {
			const cities = await fetchCities(this.value)

			citiesSelectElement.innerHTML = [
				createOption(null, 'Choose your city'),
				...cities.map(city => {
					return createOption(city.id, city.name)
				}),
			].join('')
		})
	})
})()
