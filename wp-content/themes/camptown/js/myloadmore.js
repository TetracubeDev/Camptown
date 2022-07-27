window.addEventListener('load', () => {
	sort_posts()


	function sort_posts() {
		const numberposts = 8

		let selected_filter = document.querySelector('.posts-filters__dropdown li.active a')
		let all_filter_buttons = document.querySelectorAll('.posts-filters__dropdown li a')
		let show_all_btn = document.querySelector('.posts-filters a')
		let show_more_btn = document.querySelector('.more-articles ')
		let posts_wrap = document.querySelector('.news-block>.row')
		let posts = document.querySelectorAll('.news-block .sort-item')
		let max_posts = document.querySelector('.sort-item').getAttribute('data-count');
		let timeout

		console.log(selected_filter, all_filter_buttons, show_all_btn, show_more_btn, posts_wrap, posts)
		if (all_filter_buttons && all_filter_buttons.length &&
			show_all_btn && show_more_btn && posts_wrap
		) {
			init()

			show_more_btn.addEventListener('click', () => update(null, true))
		}

		function init() {

			for (const iterator of [show_all_btn, ...all_filter_buttons]) {
				iterator.addEventListener('click', update)
			}
			if (posts.length>=max_posts) {
				hide(show_more_btn)
			}else{
				show(show_more_btn)
			}
		}

		function update(e = null, load_more = false) {
			selected_filter = document.querySelector('.posts-filters__dropdown li.active a')
			 max_posts = document.querySelector('.sort-item').getAttribute('data-count');
		
			if (selected_filter) {
				let cur_cat = selected_filter.getAttribute('data-filter')
				posts = document.querySelectorAll('.news-block .sort-item')
				console.log(posts.length)
				let query = JSON.stringify({
					cur_cat,
					posts_length: posts.length
				})

				clearTimeout(timeout);

				timeout = setTimeout(async () => {
					let res = await fetchQuery(query, load_more);
					
					console.log(res)


					posts_wrap.innerHTML = res
					posts = document.querySelectorAll('.news-block .sort-item')
					max_posts = document.querySelector('.sort-item').getAttribute('data-count');
					if (posts.length>=max_posts) {
						hide(show_more_btn)
					}else{
						show(show_more_btn)
					}
				}, 300);
			} else {
				let query = JSON.stringify({
					cur_cat: '',
					posts_length: posts.length
				})

				clearTimeout(timeout);

				timeout = setTimeout(async () => {
				
					let res = await fetchQuery(query, load_more);
					posts_wrap.innerHTML = res
					posts = document.querySelectorAll('.news-block .sort-item')
					max_posts = document.querySelector('.sort-item').getAttribute('data-count');
				
					if (posts.length>=max_posts) {
						hide(show_more_btn)
					}else{
						show(show_more_btn)
					}
				}, 300);
			}
		}


		async function fetchQuery(query, load_more = false) {
			const data = new URLSearchParams();

			data.append('blog-filter', true)
			data.append('query', query)
			data.append('numberposts', numberposts)
			if (load_more) {
				data.append('load_more', true)
			}
			let response = await fetch(window.location.href, {
				method: 'POST',
				headers: {
					// 'Content-Type': 'application/json;charset=utf-8'
				},
				body: data

			});

			return await response.text()

		}
	}


	function hide(el) {
		el.style.display = 'none'
	
	}
	function show(el) {
		el.style.display = 'block'
	
	}

});