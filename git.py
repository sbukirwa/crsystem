"""module to run a git process for a user"""
from subprocess import Popen

def run():
    """To run Github code"""
    msg = Popen("git add .", shell=True)
    commit = input("What change did you make Sonia? :  ")
    msg += Popen("git commit -m "+str(commit), shell=True)
    msg += Popen("git push origin master", shell=True)
    return msg+" All done madam"


if __name__ == '__main__':
    run()
