

class Orden {
        double unit_price
        int quantity
        double total_amount
	String status

        static belongsTo = [collectorUser : User, item : Item , table:Table]       

//

        Date dateCreated
        Date lastUpdated
        
        static constraints = {
                quantity(nullable:true)
                total_amount(nullable:true)
                unit_price(nullable: true)
		status(inList: ["Pending", "Delivered"])
        }
}
