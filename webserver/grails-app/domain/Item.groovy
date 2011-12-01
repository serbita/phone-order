

class Item {
    String title
    String description
    double price

    static belongsTo = User

    static hasMany = [ordens : Orden]                                

    static constraints = {
        description(nullable:true)
        price (nullable:true)            
   }
}
