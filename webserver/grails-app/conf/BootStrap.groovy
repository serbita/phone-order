class BootStrap {

    def init = { servletContext ->
		
		// Check whether the test data already exists.
		if (!Item.count()) {
			new Item(title: "Fernet Branca Vaso", description: "El mas rico").save(failOnError: true)
			new Item(title: "Fernet Branca Jarra", description: "La jarra loca").save(failOnError: true)
			new Item(title: "Fernet Vitone", description: "El menos rico").save(failOnError: true)
		}
		
    }
    def destroy = {
    }
}
