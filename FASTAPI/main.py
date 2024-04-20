from typing import List
from uuid import uuid4,UUID
from fastapi import FastAPI,HTTPException
from models import User,Gender,Role,UserUpdateRequest

app=FastAPI()

db: List[User]=[
    User(
        id=UUID("f0f041e4-abd0-4e81-91c0-ae9d87c607d3"),
        first_name="Jamila",
        middle_name="Ivy",
        last_name="Ahmed",
        gender=Gender.female,
        roles=[Role.student]
    ),
    
    User(
        id=UUID("8f0eb076-7c48-4442-96fd-b41ae580a668"),
        first_name="John",
        middle_name="jack",
        last_name="Alex",
        gender=Gender.male,
        roles=[Role.admin,Role.user]
    )
]

@app.get("/")
def root():
    return{"Hello": "Sithumini"}

@app.get("/api/v1/users")
async def fetch_users():
    return db;

@app.post("/api/v1/users")
async def register_user(user : User):
    db.append(user)
    return {"id":user.id}

@app.delete("/api/v1/users/{user_id}")
async def delete_user(user_id:UUID):
    for user in db:
        if user_id == user_id:
            db.remove(user)
            return
    raise HTTPException (
        status_code=404,
        detail=f"user with id: {user_id} does not exist." 
    )  
    
@app.put("/api/v1/users/{user_id}")
async def update_user(user_updte :UserUpdateRequest,user_id:UUID):
    for user in db: 
        if user.id == user_id:
            if user_updte.first_name is not None:
                user.first_name=user_updte.first_name
            if user_updte.last_name is not None:
                user.last_name=user_updte.last_name    
            if user_updte.middle_name is not None:
                user.middle_name=user_updte.middle_name  
            if user_updte.roles is not None:
                user.roles=user_updte.roles 
            return
    raise HTTPException(
        status_code=404,
        detail=f"user with id : {user_id} does not exist"
    )                  