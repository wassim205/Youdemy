try {
  const dropdown = document.getElementById("dropdown");
  dropdown.addEventListener("click", () => {
    const dropdownMenu = dropdown.querySelector(".dropdownGroup");
    if (dropdownMenu.classList.contains("hidden")) {
      dropdownMenu.classList.remove("hidden");
    } else {
      dropdownMenu.classList.add("hidden");
    }
  });
} catch (Exception) {
  console.error("the error had occured");
}
try {
  const dropdownStudent = document.getElementById("dropdownStudent");
  dropdownStudent.addEventListener("click", () => {
    const dropdownMenuStudent = dropdownStudent.querySelector(
      ".dropdownGroupStudent"
    );
    if (dropdownMenuStudent.classList.contains("hidden")) {
      dropdownMenuStudent.classList.remove("hidden");
    } else {
      dropdownMenuStudent.classList.add("hidden");
    }
  });
} catch (Exception) {
  console.error("the error had occured");
}
