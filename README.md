# Guestbook Backend

This is an online application that allows guest to drop their message and detail.

### API Deployment

API deployed at https://online-guestbook.herokuapp.com/

### API Routes

|        DESCRIPTION             | HTTP METHOD | ROUTES      |
| :----------------------------: | ----------- | ----------- |
| fetch all guest signature   |  GET  | /api/signatures  |
| fetch a specific guest signature   |  GET  | /api/signatures/{signatureId}  |
| delete a specific guest signature   |  DELETE  | /api/signatures/{signatureId}  |
| update a specific guest signature   |  POST  | /api/signatures/{signatureId}  |
| create a guest signature   |  POST  | /api/signatures  |


## License

&copy; Anuoluwapo Akinseye

Licensed under the [MIT License](https://github.com/an-apluss/guestbook-api/blob/master/LICENSE)