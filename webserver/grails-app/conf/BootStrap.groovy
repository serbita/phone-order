class BootStrap {
	
	def init = { servletContext ->
		
		def user = new User(nickname: 'henry', name:'henry',surname:'henry', password: 'secret', homepage: 'http://www.serbita.com').save()
		def item1 = new Item(title: "Fernet Branca vaso", description: "Fernet con Coca Cola", price: 25, user: user).save()
		def item2 = new Item(title: "Dr Lemon Botella", description: "Bebida con vodka y limon", price: 15, user: user).save()
		
		def table1 = new Table(name:'Mesa 4', user: user).save()
		
		def orden1 = new Orden(quantity:2, total_amount:20, unit_price:10, status: "Pending", collectorUser: user, table: table1, item:item1).save()
		
		
		
		/*
		 def orden2 = new Orden(quantity:1, total_amount:30, unit_price:30, status: "Pending")
		 user.addToOrdens(orden2)
		 item1.addToOrdens(orden2)
		 */
		//   def table1 = new Table(name:'Mesa 4')
		//   def table2 = new Table(name:'Barra 1')
		//   def table3 = new Table(name:'Barra 2')
		//   user.addToTables(table1)
		
	}
	
	def destroy = {
	}
}