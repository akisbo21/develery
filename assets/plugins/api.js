var Api = function (host) {

	var self = this;
	self.baseUrl = host;

	self.post = (url, data) => {
		url = self.baseUrl + url;

		// console.log('post', url, data);

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
					var body = res.content ? res.content : '';
					resolve(res);
				})
		});
	}
};

export default Api;