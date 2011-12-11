

class MobileController {

    def index = { 
		redirect(action: "list", params: params)
	}
	
	//http://localhost:8080/mobile/list?table=2
	def list = {
		
		def tableId = params.table
		if (tableId == null)
			tableId = 1 //default
		def tableInstance = Table.get(tableId)

		//TODO: Filtrar los items del user de la mesa pasado por parametro
		
		[itemInstanceList: Item.list(params), tableInstance: tableInstance]
	}
	
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
		
		def newOrder = new Orden(quantity:quantity, total_amount:total_amount, unit_price:unit_price, status: "Pending", item: item, collectorUser: item.user, table: table)
		
		if (newOrder.save(flush: true)) {
			render(view: "success", model: [ordenInstance: newOrder])
			
		}
	}
}
