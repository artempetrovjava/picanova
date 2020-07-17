###
@api {get} /api/pizza/:id Get pizza by ID
@apiName Get pizza by ID
@apiGroup Pizza
@apiPermission Guest
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "pizza": {
        "id": 11,
        "name": "My adorable pizza",
        "price": 20.60,
        "ingredients": [
            {
                "id": 12,
                "name": "Tomatos",
                "price": 19.55,

            }
        ]
    }
}
###

###
@api {get} /api/pizza Get pizza
@apiName Get pizzas list
@apiGroup Pizza
@apiPermission Guest
@apiVersion 0.1.0

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "pizzas": [
        {
            "id": 11,
            "name": "My adorable pizza",
            "price": 20.60,
            "ingredients": [
                {
                    "id": 12,
                    "name": "Tomatos",
                    "price": 19.55,

                }
            ]
        }
    ]
}
###
