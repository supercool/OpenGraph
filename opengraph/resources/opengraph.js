(function($){

	if (typeof OpenGraph == 'undefined') {
		OpenGraph = {}
	}

	OpenGraph.InputHelper = Garnish.Base.extend(
	{
		init: function(id)
		{
			if ( $(id).val() == '' || $(id+'-field').hasClass('has-errors') )
			{
				$(id+'-opengraph-wrapper').hide();
			}
		},
	});

	OpenGraph.AjaxLoad = Garnish.Base.extend(
	{
		id: null,

		init: function(id)
		{
			this.id = id;
			var that = this;
			$(id).on('input', function() {
				$.ajax({
					type: 'GET',
					url: 'actions/openGraph/getData',
					data: { "url" : $(id).val() },
					headers: {'Content-Type': 'application/x-www-form-urlencoded'},
					success: function(data) {
						console.log(data.title);
						//that.populate(data);
					}
				});
			});
		},

		populate: function(data)
		{
			$(this.id+'-website-name').val( data.site_name );
			$(this.id+'-title').val( data.title );
			$(this.id+'-description').val( data.description );
			$(this.id+'-image').val( data.image );
			$(this.id+'-image-object').attr('src', data.image);
		},
	});

})(jQuery);