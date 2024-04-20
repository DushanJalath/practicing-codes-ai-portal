from pymongo import MongoClient

uri = "mongodb+srv://shehara1010:Shehara2002@aiportfolio.5yejaie.mongodb.net/?retryWrites=true&w=majority&appName=AIPortfolio"
client = MongoClient(uri)

db = client.todo_db

collection_name = db["todo_collection"]