import scala.io.Source
import scala.collection.mutable
import scala.collection.immutable

class C {
  override def finalize(): Unit = println("Finalize")
}

object Utils {
  def count(arr: Array[Int], criteria: Int => Boolean): Int                                = arr.filter(criteria).size
  def exists(arr: Array[Int], criteria: Int => Boolean): Boolean                           = arr.find(criteria).isDefined
  def filterBy(arr: Array[Int], criteria: Int => Boolean): Array[Int]                      = arr.filter(criteria)
  def filterBy(arr: Array[Int], first: Int => Boolean, `then`: Int => Boolean): Array[Int] =
    arr.filter(first).filter(`then`)

  def pickBy(arr: Array[Int], criteria: Int => Boolean): Unit = {
    for (i <- 0 to arr.length - 1) {
      if (criteria(arr(i))) {
        println(s"Picked at $i")
      }
    }
  }

  def pickFirst1(arr: Array[Int], criteria: Int => Boolean): Int           = arr.filter(criteria).head
  def pickFirst2(arr: Array[Int], criteria: Int => Boolean): Option[Int]   =
    arr.filter(criteria).headOption
  def pickInAnOrder(arr: Array[Int], criteria: Int => Boolean): Array[Int] =
    arr.sortWith(_ < _).filter(criteria)

  def readFile(path: String): String = Source.fromFile(path).mkString

  @Deprecated()
  def cmpArray1(arr1: Array[Int], arr2: Array[Int]): Boolean = arr1 == arr2
  def stringifyArray(arr: Array[Int]): String                = arr.toString
}

object Main extends App {
  var filtered = Utils.filterBy(Range.inclusive(1, 100).toArray, criteria = x => x % 2 == 0)
  if (!filtered.isEmpty) {
    println(s"Found elements satisfying our criteria")
  }

  var lang1 = "Scala"
  var lang2 = "scala"
  if (lang1.equals(lang2)) {
    var substr = lang2.substring(0, lang2.length - 1)
  }

  lang1.foreach { c =>
    c match {
      case 'a' => println('a')
      case 'b' => println('b')
      case 'a' => println('a')
    }
  }

  println(lang1.indexOf("a"))
  var sb = new mutable.StringBuilder('a')
}
