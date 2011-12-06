class BootStrap {

    def init = { servletContext ->

                def user = new User(nickname: 'henry', name:'henry',surname:'henry', password: 'secret', homepage: 'http://www.serbita.com').save()
                def item1 = new Item(title: "Fernet Branca vaso")

                def table1 = new Table(name:'Mesa 4')

                user.addToItems(item1)





		def orden1 = new Orden(quantity:2, total_amount:20, unit_price:10, status: "Pending")

	user.addToOrdens(orden1)

table1.addToOrdens(orden1)

user.addToTables(table1)


	
		item1.addToOrdens(orden1)



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
