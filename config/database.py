from pymongo.mongo_client import MongoClient

client = MongoClient("mongodb+srv://anuhas:anuhas@cluster0.ww0pfvz.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0")

db = client.todo_db

collection_name = db["todo_collection"]