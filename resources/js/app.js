//
document.addEventListener("DOMContentLoaded", () => {
    const pwInput = document.getElementById("password");

    if (!pwInput) return;

    const segs = ["s1", "s2", "s3", "s4"].map((id) =>
        document.getElementById(id),
    );

    const colors = ["#e5484d", "#f5a623", "#2f54eb", "#18a058"];

    pwInput.addEventListener("input", function () {
        const val = this.value;

        let score = 0;

        if (val.length >= 8) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;

        segs.forEach((seg, i) => {
            if (!seg) return;

            seg.style.background =
                i < score ? colors[score - 1] : "var(--border)";
        });
    });
});
