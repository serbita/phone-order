class ItemOriginalController {
	
	def itemService
	
        def index = {
		redirect(action: "list", params: params)		
	}

	def list = {
		[ itemList: itemService.getItems() ]
	}
	
	def show = {		
		[ item: itemService.getItem(params.id) ]		
	}

}
