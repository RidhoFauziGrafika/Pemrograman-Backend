// import studentController
const StudentController = require("../controllers/StudentController");

const express = require("express");
const router = express.Router();

router.get("/", (req,res) => {
    res.send("Hello Express");
});

// routing student
router.get("/students", StudentController.index);
router.post("/students", StudentController.store);
// router.put("/students", StudentController.update);
// router.delete("/students", StudentController.destroy);

// export router
module.exports = router;