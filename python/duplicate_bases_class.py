import abc


class Base:
    def __init__(self):
        self.base = 1


class BaseOne:
    def __init__(self):
        self.base_one = 2


class Child(Base, BaseOne):
    """Some Child class"""


class ChildOne(Base, BaseOne, abc.ABC, abc.ABCMeta):
    """Class with duplicate bases"""
