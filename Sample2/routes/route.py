from fastapi import APIRouter

from database.database import collection_name

from models.todos import Todo

from schema.schemas import list_serial

from bson import ObjectId

router = APIRouter()


@router.get("/")
async def get_todos():
    todos = list_serial(collection_name.find())
    return todos


@router.post("/")
async def post_todo(todo: Todo):
    collection_name.insert_one(dict(todo))


@router.put("/{id}")
async def put_todo(id: str, todo: Todo):
    collection_name.find_one_and_update({"_id": ObjectId(id)}, {"$set": dict(todo)})


@router.delete("/{id}")
async def del_todo(id: str):
    collection_name.find_one_and_delete({"_id": ObjectId(id)})

