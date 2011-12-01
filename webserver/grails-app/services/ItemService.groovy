class ItemService {

    static transactional = true

    def serviceMethod() {}
	
	def getItems() {
		Item.list() 
	}
	
	def getItem(id) {
		Item.get(id)
	}

}
