import json
from uuid import uuid4

import flask


class BasePage:
    def __init__(self):
        self.html = "<h1>Hello world!</h1>"
        self.config = self.load_config()

    def load_config(self):
        with open("C:\config.json") as file:
            file_contents = file.read()
            config = json.loads(file_contents)

        return config

    def render(self):
        return self.html


class SigninMixin:
    def __init__(self):
        self.signed_in = False

    def sign_in(self):
        self.signed_in = True

    def check_signed_in(self):
        assert self.signed_in == True, RuntimeError("You are not authorized!")


class AdminDashboard(BasePage, AdminMixin, SigninMixin, AdminMixin):
    """Renders the dashboard for admins"""

    __dashboard_items = ["tasks", "users", "settings"]

    def render(self):
        return "<h1>Welcome to the Admin Dashboard</h1>"


app = flask.Flask(__name__)


@app.get("/")
def home():
    response = flask.make_response()
    response.set_cookie("userid", uuid4().hex)
