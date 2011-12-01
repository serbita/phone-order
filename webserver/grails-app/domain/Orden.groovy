

class Orden {
        double unit_price
        int quantity
        double total_amount

        static belongsTo = [collectorUser : User, item : Item]

       

        Date dateCreated
        Date lastUpdated
        
        static constraints = {
                quantity(nullable:true)
                total_amount(nullable:true)
                unit_price(nullable: true)
        }
}