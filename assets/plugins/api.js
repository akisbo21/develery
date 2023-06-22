var Api = function (host) {

	var self = this;
	self.baseUrl = host;

	self.post = (url, data) => {
		url = self.baseUrl + url;

		return new Promise((resolve) => {
			fetch(url, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
				},
				body: JSON.stringify(data)
			})
				.then(res => res.json())
				.then(res => {
					var body = res.body ? res.body : res.content;
					resolve(body);
				})
		});
	}
};

export default Api;