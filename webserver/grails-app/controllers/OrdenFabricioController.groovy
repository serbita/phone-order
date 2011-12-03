

class OrdenFabricioController {

    def index = {
        redirect(action: "list", params: params)
    }

    def list = {
        params.max = Math.min(params.max ? params.int('max') : 10, 100)
        [ordenInstanceList: Orden.list(params), ordenInstanceTotal: Orden.count()]
    }
	
	def changeStatus = {
		def orden = Orden.findById(params.id)
		orden.setStatus("Delivered")
		if (!orden.hasErrors() && orden.save(flush: true)) {
			render orden.status;
		}
	  }
}
