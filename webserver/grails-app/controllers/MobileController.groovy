

class MobileController {

    def index = { }
	
	//http://localhost:8080/mobile/show?item=1&table=1
	def show = {
		def itemParam = params.item
		def tableParam = params.table
		
		def itemInstance = Item.get(itemParam)
		def tableInstance = Table.get(tableParam)

		if (!itemInstance) {
			flash.message = "${message(code: 'default.not.found.message', args: [message(code: 'item.label', default: 'Item'), params.id])}"
			redirect(action: "list")
		}
		else {
			[itemInstance: itemInstance, tableInstance: tableInstance]
		}
	}
	
	def save = {
		def p = params
		
		def table = Table.get(params.tableId)
		def item = Item.get(params.itemId)
		
		def quantity = params.quantity ? (Integer.parseInt(params.quantity)):0 
		def unit_price = item.price
		def total_amount = quantity * unit_price
		
		def newOrder = new Orden(quantity:quantity, total_amount:total_amount, unit_price:unit_price, status: "Pending", item: item, collectorUser: item.user)
		
		if (newOrder.save(flush: true)) {
			render(view: "sucess", model: [ordenInstance: newOrder])
			
		}
	}
}
