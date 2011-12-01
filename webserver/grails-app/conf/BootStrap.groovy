class BootStrap {


		
                


    def init = { servletContext ->

                def user = new User(nickname: 'serbita', name:'Seba',surname:'Menel', password: 'secret', homepage: 'http://www.serbita.com').save()
                def item1 = new Item(title: "Fernet Branca vaso")
                user.addToItems(item1)
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
