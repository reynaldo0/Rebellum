import { useFrame } from "@react-three/fiber";
import React, { useEffect } from "react";
import * as THREE from "three";

export const useFloatAnimation = (
  objectRef: React.MutableRefObject<THREE.Object3D | undefined>,
  speed: number = 1000
) => {
  const initialY = React.useRef<number>(0);

  useEffect(() => {
    if (objectRef.current) {
      initialY.current = objectRef.current.position.y;
    }
  }, [objectRef]);

  useFrame(() => {
    if (objectRef.current) {
      objectRef.current.position.y =
        initialY.current + Math.sin(performance.now() / speed) * 5;
    }
  });
};
