

class MobileController {

    def index = { 
		redirect(action: "list", params: params)
	}
	
	//Muestra los items de una mesa dada. Utiil para pruebas. En produccion se reemplazaría con la hoja impresa con los QR
	def list = {
		//Ejemplo: http://localhost:8080/mobile/list?table=2
		def tableId = params.table
		if (tableId == null)
			tableId = 1 //default
		def tableInstance = Table.get(tableId)

		//Filtro los items del user que pertenece a la mesa pasada por parametro
		def items = Item.findAllByUser(tableInstance?.user, params)
		
		[itemInstanceList: items, tableInstance: tableInstance]
	}
	
	def show = {
		//Ejemplo: http://localhost:8080/mobile/show?item=1&table=1
		def itemParam = params.item
		def tableParam = params.table
		
		def itemInstance = Item.get(itemParam)
		def tableInstance = Table.get(tableParam)

		if (!itemInstance || !tableInstance) {
			[error: "Item o Mesa no existe"]
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
		else {
			render(view: "show", model: [itemInstance: item, tableInstance: table, error: "Error al crear la orden"])
		}
	}
}
