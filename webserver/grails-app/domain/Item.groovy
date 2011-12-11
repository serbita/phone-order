

class Item {
    String title
    String description
    double price
	
	/* Que diferencia hay entre:
	1)     static belongsTo = [user : User]
	2)     static belongsTo = User

	Para 1) existe en item un campo apuntando al user. No se puede grabar un item por si mismo, necesita de un user
			def user = new User(nickname: 'serbita', name:'Seba',surname:'Menel', password: 'secret', homepage: 'http://www.serbita.com').save()
			def item1 = new Item(title: "Fernet Branca vaso")
			user.addToItems(item1)
			
	Para 2) No existe un campo apuntando al user. Por lo tanto puedo grabar un item solo
			def item1 = new Item(title: "Fernet Branca vaso").save()
	*/

    static belongsTo = [user : User]

    static hasMany = [ordens : Orden]

    static constraints = {
        description(nullable:true)
        price (nullable:true)            
   }
}
