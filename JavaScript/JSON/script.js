let studenten = [
  { firstName: "John", lastName: "Doe", classId: 2 },
  { firstName: "John", lastName: "Doe", classId: 1 },
  { firstName: "Anna", lastName: "Smith", classId: 3 },
  { firstName: "Posay", lastName: "Tight", classId: 2 },
  { firstName: "Posey", lastName: "Clean", classId: 1 },
];

let groups = [
  { class: "SD1A", classId: 1 },
  { class: "SD2A", classId: 2 },
  { class: "SD3A", classId: 3 },
];

// studenten.forEach((student) => {
//   console.log(student.firstName);
//   groups.array.forEach((group) => {
//     // if (group.classId === student.classId) {
//     //   console.log(group.classId);
//     // }
//     console.log(group.class);
//   });
//   // console.log(student.firstName + " " + student.lastName);
// });

// for (let index = 0; index < studenten.length; index++) {
//   var indexinput = studenten[index];
//   console.log(studenten);
// }

// console.log(groups[0].classId === 1);

if (groups[0].classId === 1) {
  console.log(groups[0].class);
}

for (let index = 0; index < studenten.length; index++) {
  const student = studenten[index];
  for (let index2 = 0; index2 < groups.length; index2++) {
    const group = groups[index2];
    if (student.classId === group.classId) {
      console.log(student.firstName + " " + group.class);
    }
  }
}
