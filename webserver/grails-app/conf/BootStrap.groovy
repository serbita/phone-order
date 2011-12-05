class BootStrap {


		
                


    def init = { servletContext ->

                def user = new User(nickname: 'serbita', name:'Seba',surname:'Menel', password: 'secret', homepage: 'http://www.serbita.com').save()
                def item1 = new Item(title: "Fernet Branca vaso")
                user.addToItems(item1)
				def orden1 = new Orden(quantity:2, total_amount:20, unit_price:10, status: "Pending")
				user.addToOrdens(orden1)
				item1.addToOrdens(orden1)
				
				def orden2 = new Orden(quantity:1, total_amount:30, unit_price:30, status: "Pending")
				user.addToOrdens(orden2)
				item1.addToOrdens(orden2)
/*
                if (!Item.count()) {
			new Item(title: "Fernet Branca Vaso", description: "El mas rico").save(failOnError: true)
			new Item(title: "Fernet Branca Jarra", description: "La jarra loca").save(failOnError: true)
			new Item(title: "Fernet Vitone", description: "El menos rico").save(failOnError: true)
		}
*/
    }

    def destroy = {
    }
}
